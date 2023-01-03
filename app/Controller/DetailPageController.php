<?php

namespace App\Controller;

use App\Foundation\Request;
use App\Foundation\ViewRenderer;
use PDOException;
use PDO;

class DetailPageController
{
    public function __construct(private ViewRenderer $viewRenderer, private PDO $pdo)
    {
    }

    public function execute(Request $request): string
    {
        $id = (int) $request->get('id');

        $details = $this->getUserDetails($id);

        if ($details === null) {
            return $this->viewRenderer->render('404', [
                'message' => sprintf($_ENV['USER_ID_INVALID'], $id)
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

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_BOTH);

        return is_array($result) ? $result : null;
    }

    public function deleteUser(Request $request): string
    {
        $id = (int) $request->post('id_to_delete');

        $details = $this->getUserDetails($id);

        try {
            $stmt = $this->pdo->prepare('DELETE FROM users WHERE id=:id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $message = sprintf($_ENV['USER_DELETED'], $id);
            return $this->viewRenderer->render('deleteResult', ['details' => $details,
                "successMessage"=> $message]);
        } catch (PDOException $e) {
            $message = sprintf($_ENV['USER_NOT_DELETED'], $id);
            return $this->viewRenderer->render('deleteResult', ['exceptionMessage' => $e->getMessage(),
                'errorMessage'=> $message, 'details' => $details]);
        }
    }
}
