document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var bookingId = button.getAttribute('data-booking-id');
        var type = button.getAttribute('data-type');

        // Set the hidden input value
        document.getElementById('booking_id').value = bookingId;

        // Fetch current data via AJAX
        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=get_booking_details&booking_id=' + bookingId,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate the fields based on the type
                if (type === 'outbound') {
                    document.getElementById('assigned_driver').value = data.data.assigned_driver;
                    document.getElementById('assigned_vehicle').value = data.data.assigned_vehicle;
                    document.getElementById('return-fields').style.display = 'none';
                    document.getElementById('outbound-fields').style.display = 'block';
                } else {
                    document.getElementById('assigned_driver_return').value = data.data.assigned_driver_return;
                    document.getElementById('assigned_vehicle_return').value = data.data.assigned_vehicle_return;
                    document.getElementById('outbound-fields').style.display = 'none';
                    document.getElementById('return-fields').style.display = 'block';
                }
            } else {
                alert('Failed to fetch booking details.');
            }
        });
    });

    document.getElementById('editBookingForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var bookingId = document.getElementById('booking_id').value;
        var assignedDriver = document.getElementById('assigned_driver').value;
        var assignedVehicle = document.getElementById('assigned_vehicle').value;
        var assignedDriverReturn = document.getElementById('assigned_driver_return').value;
        var assignedVehicleReturn = document.getElementById('assigned_vehicle_return').value;

        // Update fields via AJAX
        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=update_booking_details&booking_id=' + bookingId +
                  '&assigned_driver=' + encodeURIComponent(assignedDriver) +
                  '&assigned_vehicle=' + encodeURIComponent(assignedVehicle) +
                  '&assigned_driver_return=' + encodeURIComponent(assignedDriverReturn) +
                  '&assigned_vehicle_return=' + encodeURIComponent(assignedVehicleReturn),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Booking updated successfully!');
                location.reload(); // Reload the page or update the row dynamically
            } else {
                alert('Failed to update booking.');
            }
        });
    });
});
