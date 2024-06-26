<?php

namespace App\Http\Controllers;

use App\Models\CDocument;
use App\Models\DocumentRevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CDocumentController extends Controller
{
    public function editDocument(Request $request, $id)
    {
        $document = CDocument::findOrFail($id);
        $previousContent = $document->content;

        // Сохраняем предыдущий контент в ревизии
        DocumentRevision::create([
            'document_id' => $document->id,
            'content' => $previousContent,
        ]);

        // Обновляем документ
        $document->update(['content' => $request->input('content')]);

        // Отправляем уведомление пользователям
        foreach ($document->users as $user) {
            // Здесь вызываем функцию отправки email, которая пока может быть пустой
            $this->sendEmailNotification($user->email, "Документ был изменен", "Документ с ID {$document->id} был изменен.");
        }

        return response()->json(['message' => 'Документ обновлен'], 200);
    }

    public function delDocument($id)
    {
        $document = CDocument::findOrFail($id);

        // Отправляем уведомление пользователям
        foreach ($document->users as $user) {
            // Здесь вызываем функцию отправки email, которая пока может быть пустой
            $this->sendEmailNotification($user->email, "Документ был удален", "Документ с ID {$document->id} был удален.");
        }

        // Удаляем документ
        $document->delete();

        return response()->json(['message' => 'Документ удален'], 200);
    }

    private function sendEmailNotification($to, $subject, $message)
    {
        // Здесь будет логика отправки email
        // Mail::to($to)->send(new YourMailableClass($subject, $message));
    }
}
