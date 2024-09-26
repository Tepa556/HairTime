function redirectToService(service) {
    // Кодирует текст услуги для безопасной передачи в URL
    var encodedService = encodeURIComponent(service);
    // Перенаправляет на страницу с передачей параметра service
    window.location.href = 'registration-on-services.php?service=' + encodedService;
}


