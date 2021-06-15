# ERP-Fullstack-Laravel
For this project, whe have a given repo named ERP-Fullstack-Laravel, with a GitHub remote URL named https://github.com/it-academyproject/ERP-Fullstack-Laravel.git
Remember to use git checkout branchName to switch branches if needed.
Given a GitHub remote repo with files .gitignore and README.md already in it, and wanting to set up a LARAVEL project inside that repo, we have done the following steps in console:
1. Clone the repo from remote to local: git clone https://github.com/it-academyproject/ERP-Fullstack-Laravel.git
2. Access that folder in local: cd ERP-Fullstack-Laravel
(optional) check the branch we're in is "dev": git branch 
3. If the default is main branch, Switch to Dev branch: git checkout Dev (console give us feedback of branch switched) .
4. You need to access iteracion_laravel folder: cd ERP_Laravel.
5. To install the php packages (you can see it in composer.json) run "composer install".
6. To install the npm packages (you can see it in package.json) run "npm install" (optional it depends on the project).
7. Now, you need to set the .env file. In the project you should see a .env.example file. You can clone it running "cp .env.example .env ". If the file doesn't exist, you can create it copying from another project. Then, configure .env file.
8. Before you can open the project, you need the artisan key. Run "php artisan key:generate".
9. For the Laravel project you need an empty database. Then, set it in .env file. Remember: the database name has to be the same in the .env file and in your localhost.
10. At last, if the project works with any kind of Laravel packages, you have to install their keys too. For example in a API project you would need: Passport "php artisan passport:client" or Jason Web Token (JWT) "php artisan jwt:secret")
11. Create the project database running: "php artisan migrate" and, if the project have seeders, "php artisan db:seed".
12. Enjoy :)
