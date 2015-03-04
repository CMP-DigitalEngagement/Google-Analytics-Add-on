# Google Analytics Add-on

##Instructions

###Setup google project

1. Create a project using Google Dev Console (https://console.developers.google.com)
2. Go into your project and enaple Analytics API (under APIs & Auth -> API)
3. Create a service account by going to Credentials -> Create New Client ID -> Service account
4. This will download a P12 file (you can generate another one later if needed) it will be needed to authenticate your application
5. In your analytics account authorize a user with the email address of your service account (it should end in @developer.gserviceaccount.com found on the Credentials page of your project) it should have "Read & Analyze" access

###Setup the add-on
Edit the config file (config.php) and replace the following:

1.  [Client ID] with your client ID from the Credentials page.
2.  [Service address] with the Service email address used in Step 5 from above
3.  [Application Name] with yout project ID which can be found at the top of the Overview page
4.  [P12 File] with the file path of the P12 file downloaded in Step 4 from above
5.  You may also want to remove "showErrors();" at the top to hide PHP errors

##How to use

The typical use is as follows:

```PHP

  require_once 'analytics.php';
  
  /* Get analytics object */
  $client = getClient();
  $token = Authenticate($client);
  $analytics = new Google_Service_Analytics($client);
  $account = "Your Analytics account ID";
  
  
  /* Run a query */
  runQuery($analytics, $account,"2015-01-01","2015-01-31","ga:pageviews,ga:visits,ga:users","ga:date");
  
  ```
  


