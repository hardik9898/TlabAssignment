    clone git repository
    
    install vendor directory 
        >>composer install

    copy .env.example to .env
    configure database user name and password on .env
    configure smtp details for emails
    
    migrate database and run seedar
        >> php artisan migrate
        >> php artisan db:seed
    


    for admin
        /admin/login
    login details   
        emails:admin@gmail.com
        password:123456

    this project will be direct run without php artisan serve
    so directly run root of project directly
    for ex: 
    http://localhost/laravel_task
    laravel_task is directory that contain direct setup of this code

    frontend side 
        /register --> Therapist registration 
        /login --> Therapist login 

    pls keep PHP version as per composer.json 
    to receive email need fire command "php artisan queue:work" after registration done

    for API
    to retrive all services
        {APP_URL}/api/services-list 
    store services data    
        {APP_URL}/api/services-store?service_name=test&descriptions=fdsf

