
<img src="https://img.shields.io/badge/USES-HTML-blue?style=for-the-badge"> <img src="https://img.shields.io/badge/USES-CSS-blue?style=for-the-badge">
<img src="https://img.shields.io/badge/USES-TAILWIND-blue?style=for-the-badge"> <img src="https://img.shields.io/badge/USES-MYSQL-blue?style=for-the-badge">
<img src="https://img.shields.io/badge/USES-JAVASCRIPT-blue?style=for-the-badge"> <img src="https://img.shields.io/badge/USES-PHP-blue?style=for-the-badge">
<img src="https://img.shields.io/badge/MADE%20WITH-LARAVEL-brightgreen?style=for-the-badge">


# Image Share Website



## General informations 
Title       : J'IMAGE (my image sharing website) 

Description : The objective of this project was to "non-identically" reproduce the Pinterest platform.


## Author
João Andrade => Junior Web Developer @Becore.org


## Link
https://jimageshare.herokuapp.com


## Functionalities
-> A home page that includes all the users shared images displayed in the form of tiles.

-> A page where the user can upload images to the website.

-> When you click on the images, you are redirected to a page that provides more details to it by displaying:
- The image (redirects to an external link on click)
- His title
- Its description
- The author of the share (redirectind to his/her profile on click)
- A like button to like the picture
    
-> A Login and Register page where the user must be characterized by:
- Name
- First Name
- Nickname
- Profile Picture
- Email address
- Password
    
-> A profile page that shows:
- All the users information
- All the users shared images
- All images liked by the user
- How many images where uploaded by the user
- How many likes the user received in total
    
-> If the user is logged in, in his own profile page he will also be able to:
- Change the avatar
- Change the background picture
- Edit all his/her info
- Change email
- Delete the account

-> All the information added by the user is validated in the controllers and sanitized by a personal middleware.

-> After the registration the user will receive a confirmation email.

-> The user can only upload an image if logged in and with the email confirmed.

-> When the user uploads an image, that image will be validated and also duplicated to a new image (tumblr) with a personalized size to be used trow the        website.

-> All the website is fully responsive to tablets and smartphones.

-> All the database is in an online Mysql database.





## Version 
version : V-001
