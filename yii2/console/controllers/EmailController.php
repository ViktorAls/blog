<?

namespace console\controllers;

use backend\models\Task;
use common\models\User;
use linslin\yii2\curl\Curl;
use Yii;
use yii\console\controller;

class EmailController extends Controller
{

    private $subject = 'У вас на подходе не выполненные задачи.';
    private $name = 'Администратор';
    public $clock = null;

    public function options($actionID)
    {
        return ['clock'];
    }

    public function optionAliases()
    {
        return ['c' => 'clock'];
    }

    public function sendPush($user, $tasks)
    {
        foreach ($tasks as $task) {
            if ($task['id_user'] === $user['id']) {
                $curl = new Curl();
                $params = [
                    'to' => $user['push_token'],
                    'collapse_key' => 'type_a',
                    'notification' =>['body'=>$task['description'], 'title'=>$task['title']],
                ];
                $curl->setRequestBody(json_encode($params))
                    ->setHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'key=AAAAPNijyXk:APA91bHSApMP9eDvRdeCk_F5OR7zJ9_wA9xtgfyRy63ZTZHi1Kq5CnZWq3IyhXPdV1kykaL90P7W3pgzQIe2P9i1LsJTHdVJDSZBqD6JPQb9HSMfrklUYKjXTCijzegi-p8MHRFUa584',
                    ])->post('https://fcm.googleapis.com/fcm/send');
            }
        }
    }

    public function actionIndex()
    {

        if ($this->clock === null || $this->clock < 0 || !is_int($this->clock)) {
            $this->clock = 3;
        }
        $time = time() + 60 * 60 * $this->clock;
        $date = date('Y-m-d H:i:s');
        $date2 = date('Y-m-d H:i:s', $time);
        $newTasks = Task::find()->asArray()->where(['between', 'date_end', $date, $date2])
            ->with('user')->all();
//        Task::deleteAll(['<','date_end',$date]);
        if (!empty($newTasks)) {
//            Yii::$app->twilio->sms('+375298096531', 'У Вас есть не выполненные задачи.',[
//                'from' => '+12028049472' ]);
            $users = User::find()->where(['success' => 1])->andWhere(['!=', 'push_token', 'null'])->asArray()->all();
            foreach ($users as $user) {
                $this->sendPush($user, $newTasks);
            }
            Yii::$app->mailer->compose(
                [
                    'html' => 'task-html'
                ],
                [
                    'title' => $this->subject,
                    'description' => $newTasks,
                    'name' => $this->name,
                    'email' => Yii::$app->params['adminEmail']
                ]
            )->setTo(Yii::$app->params['adminEmail'])
                ->setFrom([Yii::$app->params['adminEmail'] => $this->name])
                ->setSubject($this->subject)
                ->setTextBody('Для просмотра задач перейдите в управление сайтом.')
                ->send();
            echo 'Количество не выполненных задач: ' . count($newTasks);
        } else {
            echo 'На данные момент, задач нет.';
        }

        return 0;
    }
}