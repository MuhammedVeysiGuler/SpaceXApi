# SpaceX Api
<h3>Pulls data from SpaceX connection</h3>

    
        composer update
    
        php artisan key:generate
    
        php artisan migrate seed
        
        php artisan passport:install


<li>Run every 3 minutes to pull or update data
       
        php artisan schedule:work
    
</li>

<li>After logging in with Swagger you can send API requests</li>

<li>Default Login Infos

        email    : test@test.com
        password : 12345678

</li>

<li>After logging in, you can log in by putting the token address given to you in the relevant place.

        Bearer yourTokenAddress

</li>
