#Shel

##What is Shel?

Shel is an extremely simple and lightweight blogging platform with a few core principles in mind. Primarily, blogging should be about the content, and bloggers shouldn't be focusing on the presentation. Shel allows you to write a blog in any format you choose, as long as there's a translator available for it (markdown is included by default). If not, write your own - it's extremely simple. 

Shel was heavily inspired by static site generators such as Jekyll. As a result, all posts are single page files. However, unlike static site generators, you don't need to run a program before uploading anything, you simply upload your file (in whichever format you prefer), suffix it with .shel, and Shel takes care of the rest.

##Usage

By default, Shel comes with Markdown support. To get started, upload a post to /posts written in Markdown format. The filename should be structured as follows: date-title.shel. The date should be in the format DD-MM-YYYY. For example 20-02-2012-Hello.shel. Your post should be entirely content (don't include the title, that's done automatically based off the filename).

##Creating a new translator
A translator converts a post into HTML. All translators are stored in /translators and must implement the interface Translator (which just states that they must contain the public method translate). The structure of /translators is as follows:

    /translators
      /translatorname
        translatorname.php
      translator.php


This is easiest seen by taking a look inside /translators at the default Markdown translator.

##To do list (feel free to contribute!):
* Exceptions + exception handling (currently no errors, etc are thrown)
* Add support for comments (possibly via disqus)
* Refactor the code (currently quite messy, it's a functioning first iteration)
  * The monolithic Shel class needs to be removed and replaced with classes that make more sense
* Add support for components/addons - navigation will be moved into a component

##A note on comments on the source code
Occasionally while looking through the source code, you'll see perl style comments. These comments are essentially a mini todo list inside the source code, so if you see them, feel free to fork and sort it out!