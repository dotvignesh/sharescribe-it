# SHARESCRIBE-IT

## Project Overview:
Sharescribe it! Is a platform built with a goal to allow users to stop wasting money on subscriptions that are ‘seldom used but are also occasionally needed’, by sharing their subscriptions with users who have similar needs and hence splitting the bills to make their subscription costs more worth it!
The application uses a simple SQL Query match of users having the same values under ‘subscriptions’ to match them together.
The users are then prompted to purchase a shared subscription of users, that are already purchased, at a lower price.
The price paid by shared users goes directly to the original subscriber thus reducing costs for all users involved in our platform.
The subscription services have been broadly grouped into 5 domains – streaming, education, productivity, magazines and music.

## Objectives:
 -Enable users to share common subscriptions that they wish to. 
 -Result in a decreased spending on subscriptions for our users.
 -Provide users with an increased range of choices other than their inner circles.
 -Provide subscription model companies more potential users by directing our users to their sites, when no share-able subscription is available.

## Structure: 
 
SQL DATABASE         :  SUBSCRIPTIONAPP
SQL TABLES USED    :    1. USERS
                        2. USER_PREFERENCES
                        3. SUBSCRIPTIONS
 
## HTML files: 1
 
index.html :   
Log in/sign in page, prompts user to enter a username and a password which upon pressing enter is updated into a table ‘users’ in the ‘subscriptionapp’ database, along with an ID that will be used to uniquely identify the users  and perform search queries in later files.
 
 
## CSS files: 6
 
register.css
homepage.css
profilepage.css
payment.css
app.css
results.css
 
 
## PHP files:  14
 
config.php : 
      Config file containing server, user, password and database details. 
 
register.php : 
      Facilitates adding the user credentials to a table ‘user’ in the ‘subscriptionapp’  
      Database
 
signin.php :
      Provides a sign in message if the username and password entered in index.html already exist in the database.
      
preferences.php :   
      Requests users to select subscription categories out of the five that they                                                                                                                        are interested in and additionally their current subscription costs.
 
interests.php : 
      Passes the values selected by user in preferences.php to a table ‘subscriptions’.
 
home_page.php : 
      Displays the requisite subscriptions that the user is interested in which upon clicking takes them to listings.php. 
 
profilepage.php :  
      Displays information about the current user along with an option to their interests and subscription preferences.
 
updatepreferences.php :  
      Updates the users preferences to the ‘user_preferences’ table.
 
add_subscriptions.php :  
      For users who have a subscription active currently, enables them to add the details of their subscription including the subscription service, cost, billing cycle, and the username and password for the said subscriptions.
 
add.php : 
      Adds the subscription details if added by the user to the ‘subscriptions’ table.
 
listings.php :  
      Displays the available subscriptions, subscribed to and willing to share by our users to other users to purchase. Also provides them access to official sites of the service if none are available to share.
 
payment.php :  
      Displays a payment page with form validation for credit card details.   
 
processing.php :  
      Follow up processing page for payment.php.
 
update_num_users  : 
      Updates the column ‘num_users_sharing’ in the subscriptions table by one.
