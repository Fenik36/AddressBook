# Address Book
#### Video Demo:  <URL https://youtu.be/UrGwzXvliZM>
#### Description:
It is an online address book using Php framework laravel and used blade to display content instead of other frontend frameworks like for example angular
the features are:
register
login
logout
create contact
edit/ delete contact
export contact list as vcf
you can upload a photo for each cotact
search

I used tailwind as a UI toolkit
also I have created a database models, factories, and seed, to create the tables using one command php artisan migrate and then use php artisan db:seed to create dummy data
I have used web.api file as a route file where every route the user will go is listed in there
Also in the resources folder in the views there is the blade.php files each one has specific display

Users folder:
register.blade.php  --> this contain the view of register page
login.blade.php   --> this contain the view of login page


partial folder:
_Search.blade.php   --> this the search bar view
_Hero.blade.php   --> this the hero view


conact folder:
create.blade.php   --> this views the add new contact form
edit.blade.php    -->  this views the edit contact form
index.blade.php   --> this views the contacts of a certain user
manage.blade.php  --> this views the manage page for contacts of the signed on user
show.blade.php   --> this views each contact card with whole info



component folder:
contacts.blade.php   --> this views and deal with each contact info
container.blade.php   --> this a container card for contacts in the main page
flash-message.blade.php   --> this view of the flash card that appear after each succeful operation
layout.blade.php   --> this the layout that has every other view inside it
tags.blade.php  --> this the view of the tags for each contact



I have also created the file C:\Users\Zack\Desktop\Copy\AddressBook\app\Http\Controllers\ContactsController.php. Here where all the backend happend data validation check the authantication and etc.

also edit the .env file with my databae info like database name user pass and name.

I hope I have not forget anything Important.


PS: I had problem with exporting contacts list as vcf file I had some help from my friend who is not from cs50 a fellow programer (Not professional) he helped me in this part but still could not exmport all the list did not know where I gone wrong thats the feature that has some problem in it and I hope I did not break the honor code with my friend helping me.



