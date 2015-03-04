# Google Analytics Add-on

##About

This project is designed to simplify using the Google Analytics API.  It streamlines the authentication process for service accounts which do not require the user to have a google account authorized with your analytics (basically it's for dashboards).  It also (hopefully) has an easier to use function for querying Google Analytics.

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

###Example use

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
  
###Function Reference
  
####runQuery
```php
runQuery(Analytics, Account, StartDate, EndDate, Metrics, Dimmensions, Sort, MaxResults, Filters, Segment)
```
 \* **Required**

#####Use Google Query Explorer (GQE)

https://ga-dev-tools.appspot.com/explorer/

Open the query explorer and generate your queries with this.  It's fairly easy to use and this function is setup to work with the query explorer.

#####Analytics*
The Analytics API object provided by:
```php
$analytics = new Google_Service_Analytics($client);
```

#####Account*
The account ID of your analytics account.  You can get it from "ids" field in the GQE.

#####StartDate*
The starting date of data to retrieve

#####EndDate*
The ending date of data to retrieve

#####Metrics*
The data to return from the query (e.g. pageviews)

#####Dimmensions
How to break down the data retrieved (e.g. by date)

#####Sort
How to sort the data (e.g. date ascending)

#####MaxResults
How many results to return

Default: 1000 rows

#####Filters
Filter out data (e.g. only show mobile users)

#####Segment
Use a Google Analytics segment (basically a pre-defined filter)

###For more information on GA API:

https://developers.google.com/analytics/devguides/reporting/core/v3/
