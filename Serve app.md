Serve app

setting up server steps: 

1:Set up site;
2:Set up database;
3:ssh into the server and enter web folder,
4:delete everything there and clone the app there if using git;
5:copy .env file;
6: update appname , app_url , database settings and php artisan key:generate;
7: run php artisan storage:link;
8:run composer and npm;
9:can set up cron as well (add * to every field then add cmd from crontab in the server);
10:setting up jobs, cant do it with supervisor if ur not admin - set up with screen -dmS name and run php artisan queue:work;
11:

Putting app on server migrate will cause problmes bcz mysql is old version , new verison is MariaDB , timestamps will cause issue need to change to be nullable to fix
