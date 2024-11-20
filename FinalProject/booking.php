<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['book_ticket'])) {
        $user_id = $_POST['user_id'];
        $ticket_id = $_POST['ticket_id'];

        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, ticket_id, status) VALUES (?, ?, 'pending')");
        $stmt->execute([$user_id, $ticket_id]);
        
        echo "Tiket berhasil dipesan. Silakan lakukan pembayaran.";
    }

    if (isset($_POST['confirm_payment'])) {
        $booking_id = $_POST['booking_id'];

        $stmt = $pdo->prepare("UPDATE bookings SET status = 'confirmed' WHERE id = ?");
        $stmt->execute([$booking_id]);

        echo "Pembayaran dikonfirmasi. Tiket Anda sudah valid.";
    }

    if (isset($_POST['request_refund'])) {
        $booking_id = $_POST['booking_id'];

        $stmt = $pdo->prepare("UPDATE bookings SET status = 'canceled' WHERE id = ?");
        $stmt->execute([$booking_id]);

        echo "Permintaan refund diproses. Dana akan dikembalikan.";
    }
}
?>
