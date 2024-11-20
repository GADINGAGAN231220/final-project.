document.getElementById('bookingForm').addEventListener('submit', function (e) {
    e.preventDefault();
    
    const userId = document.getElementById('user_id').value;
    const ticketId = document.getElementById('ticket_id').value;
    
    fetch('booking.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ book_ticket: true, user_id: userId, ticket_id: ticketId })
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('message').textContent = data;
    })
    .catch(error => console.error('Error:', error));
});
