$(document).ready(function () {
    $('#commit').click(function (e) {
        e.preventDefault();
        updateProgress();
        $.ajax({
            url: '/employees/commit',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
            },
            error: function (xhr, status, error) {
                console.error('Error triggering commit:', error);
            }
        });
    });

    function updateProgressBar(progress) {
        $('#progress-bar').css('width', progress + '%');
        $('#progress-bar').attr('aria-valuenow', progress);
    }

    function updateProgress() {
        $.ajax({
            url: '/employees/progress',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response)
                updateProgressBar(response.progress);
                if (response.progress < 100) {
                    setTimeout(updateProgress(), 10000);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching progress:', error);
            }
        });
    }
});
