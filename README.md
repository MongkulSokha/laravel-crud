
## Please read it before run my project teacher!

#### Testing
username: Me\
email:me@me\
password: 123456789aA

username: You\
email: you@you\
password: 123456789aA

### Database in folder: about-project (you can import for testing)

### Image store in Cloudinary


## About My Project
- This project I have created new using tailwind that is default style of laravel
- For update, delete you can do it only user is owner of the post
- For my image, I store it in Cloudinay you can change [CLOUDINARY_URL] to your [CLOUDINARY_URL] in file .env for debug (when user delete post the image will be deleted too. when user update image post old image will be deleted and add new to cloudinary)
- I have prevented user input [invalid image] the both of frontend and backend
- [image_url] field in database I store it for get image with url from my cloudinary
- [image_public_id] field in database I store it for when I want to delete image using public id of image in my cloudinary
- For category, I created it using factory (in DatabaseSeeder file)
- I have prevented user input [invalid category]



### 2023 &copy;copyright SOEUN Seida
