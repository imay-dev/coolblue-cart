# Coolblue interview assignment

Welcome to the Coolblue interview assignment. 
This is a small codebase, whose simple purpose it is to retrieve shopping cart information from a database and display it to the browser. As you can undoubtedly see this codebase has various issues.

## The assignment

Your assignment is to improve this codebase. You can do this in any way you like, and you can take it as far as you'd like. Rewrite chunks, unit test it first, use composer components or change the MySQL schema completely.

There's only one hard requirement that we'd like to see: Currently there's a hard dependency in MySQL in the repository. We would like the possibility in the future to swap out the data store easily. You don't have to write a new adapter yet, just make it possible for us to easily swap data stores.

What we're mostly looking for is to see is what you chose to tackle and how you went about it. Please make regular git commits while working on the project, and zip the .git folder along when handing in the assignment, so we get a feel for the way in which you've worked and how you went about changing the application. 

_Note: You can use a framework to help you, but keep in mind that we are mostly interested in seeing what you can do - we're not looking for a showcase of your favorite framework._

We ask that you spend at most 4 hours on this assignment to keep a level playing field. If you didn't get to something in that time you'd still like to have tackled, feel free to add a readme file like this to your project with the next steps you would have done, given more time.

### Running the application
To get you started easily the codebase comes with a docker-compose setup. Provided you have docker installed, start the app with `docker-compose up`, after which you can access the "application" via `http://localhost:8080`. Alternatively you can run your own basic PHP server. All dependencies like PHP version and required extensions are specified in the composer.json file.

## The interview

An appointment will be made to talk to you about your assignment. During this one-hour interview two Coolblue PHP developers will ask you to explain the choices you made and answer questions about the assignment and web development in general. Please ensure you're able to screenshare your IDE in this meeting (through Google Meet).

## Good luck!
