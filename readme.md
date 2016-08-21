# Project Management Application

Project Management v2.0 is an end user web interface performing queries to an API using the REST web architecture. The UI was designed to create an understandable experience for the administrator who has access to the system.

Project Managment Application can: 
    - Index all the current projects
    - Create a new project
    - Edit an exisiting project
    - Delete an exisiting project


The application uses PHPs cURL function to perform requests to the web services and receives JSON responses which is then decoded and the data is presented in the required format. 

	
The application is designed in the Laravel 5 framework and uses [Custom PHP cURL library](https://github.com/ixudra/curl) for the Laravel 5 framework.

## Known Bugs
	- Calender not working in Firefox, manual date entry is necessary.
	- After logging out login form is not assigned CSRF token value, close window and open new window to log in.

Will update the documentation as soon as the bugs are fixed 
 

## License

The Project Management Application is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
