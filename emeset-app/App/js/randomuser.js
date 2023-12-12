import $ from 'jquery';

function randomuser(userId) {
    $.ajax({
        url: 'https://randomuser.me/api/',
        dataType: 'json',
        success: function (data) {
            if (data.results && data.results.length > 0) {
                const randomUser = data.results[0];

                const userUpdate = {
                    'Nom': randomUser.name.first,
                    'Cognom': randomUser.name.last,
                    'Correu': randomUser.email,
                    'Contrasenya': 'testing10',
                    'rol': 'random_role',
                    'estado': 'active',
                };

                updateUserData(userId, userUpdate);
            } else {
                console.error('Failed to fetch random user data.');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX request failed:', status, error);
        }
    });
}

function updateUserData(userId, userUpdate) {
    // Implement your logic to update user data in the container
    // You can use the userId to identify the user and apply the updates
    // For example: container["Users"]->updateUserById(userId, userUpdate);
}

// Example function triggering the update for a specific user ID
function updateRandomUserForId(userId) {
    randomuser(userId); // Corrected function name here
}

export { randomuser, updateRandomUserForId };
