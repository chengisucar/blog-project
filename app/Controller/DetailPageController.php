<?php

namespace App\Controller;

use App\dbconnect\DbConnect;
use App\Foundation\Request;
use App\Foundation\ViewRenderer;
use PDO;

class DetailPageController
{
    private PDO $database;

    public function __construct(private ViewRenderer $viewRenderer)
    {
        $this->database = (new DbConnect())->createConnection(); // todo: refacor
    }

    public function execute(Request $request): string
    {
        $id = (int) $request->get('id');

        $details = $this->getUserDetails($id);

        if ($details === null) { // todo: refactor
            return $this->viewRenderer->render('404', [
                'message' => sprintf('user with %s id is not applicabble', $id)
            ]);
        }

        return $this->viewRenderer->render('detailpage', [
            'id' => $id,
            'details' => $details,
        ]);
    }

    private function getUserDetails(int $id): null|array
    {
        $query = 'SELECT `id`, `name`, `hobbies`, `created_at` FROM users WHERE `id` = ?';

        $stmt = $this->database->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return is_array($result) ? $result : null;
    }
}
