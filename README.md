# TO DO

1. Add ```.sql``` file with commands and queries required to set up the database schema. 
2. What is directory.php?
3. Read MySQL credentials from a .ini/config file instead of putting them in source in ```mysql_values.php```.
4. What is ```index-special.php```?
5. Update ```README.md``` with details on what each view does and setup instructions.
6. Is PDO or mysqli being used? Some files use the former, while the rest use the latter. Is app SQL Injection safe?
7. Is ```php.php``` a necessary file?
8. ```play_song.php```, ```server.php```, ```show_songs.php```, ```show_podcasts.php```, ```try_show.php``` still has credentials in source code. 
9. In some places in code, there is no ```exit()``` command after ```header("Location: XYZ")```. Code after ```header()``` [continues to get executed](https://stackoverflow.com/a/42514232) unless we explicitly exit the script.
10. Salting + hashing user paswords, and store salt in Database. (currently user passwords are only being hashed)
11. Why is ```recent.php``` in the ```/css , /js``` folders?
12. It appears album covers are currently being saved in ```/img```. What is ```/podcast_details``` then? Save ICONS and site graphics in ```/img``` folder and all user-generated images (album covers, etc) in another new directory, perhaps ```/medis```.



