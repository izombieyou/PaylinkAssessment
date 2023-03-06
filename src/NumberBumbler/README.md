# Technical Test Documentation
So the application first. Spun up in docker locally and routes of interest are:

http://localhost:8080/ - for some very basic output from the functions
http://localhost:8080/fib/<sequence> eg 6 to play more deeply with fibonacci generation
http://localhost:8080/fizzbuzz/<from>/<to> eg 1/30 to further experience the childlike joy fizzbuzz provides

I opted to use the slim framework because I saw a talk on it at an unconference some years back and thought it'd be nice to try something new.

That and a lightweight framework seemed like it'd be all I'd need, I may have benefitted from a more mainstream framework with more up to date documentation.

## FizzBuzz
This question forced my to make some assumptions, which hopefully are very reasonable assumptions that follow the intention. These are:

* Only show one result per number
* Show only the "heaviest" / most complex result per number
* Divisble by to mean wholly divisible whole integer division without remainder

The original implementation of fizzbuzz was a little smaller but it seemed sensible to utilise it for the magic get/set task too.

## Fibonacci
Outside of interview questions I've used recursion once, maybe twice in my career. 

## MagicGetterSetter
Originally I implemented this as a class for my own convenience but couldn't let that lay so it got switched to traits since that seems like a better solution to me.

Trait seemed like the better choice as both get and set could be independently implemented allowing class by class choice of whether to be read only or allow write too.

Interface seemed weak because the implementation wasn't likely to change too much from class to class introducing a slew of copy pasta.

Class seemed okay but heavy handed in terms of forcing the inheritance of those functions or forcing the use of different base classes, creating complexity and asking for more but possibly better hidden copy pasta.

Plus introducing a base class only plays nice at the inception of a project.