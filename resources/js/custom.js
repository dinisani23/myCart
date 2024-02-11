function updateQuantity() {
    var quantity = document.getElementById('{{ $item->id }}').value;
    var itemId = quantity; // Pass the item ID to the AJAX request
    var token = '{{ csrf_token() }}';

    // Send AJAX request
    $.ajax({
        url: '/update',
        type: 'POST',
        data: {
            _token: token,
            item_id: itemId,
            quantity: quantity
        },
        success: function(response) {
            // Handle success response
            console.log('Quantity updated successfully');
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error('Error updating quantity: ' + error);
        }
    });
}