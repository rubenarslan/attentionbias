Attention Bias Modification Training
====================================

This is the entire website that was used to conduct attention bias modification training for OCD patients (Habedank, Lennartz, Arslan, & Ertle, submitted).

The software is released as free, open source software. 

## Modified dot probe task
Please confer Habedank, Lennartz, Arslan, and Ertle (submitted) for an extensive description of the modified dot probe task.
Please confer the train.js, train.ctp and TrialsController.php files, if you are interested in the Javascript application
at the heart of this training. 
In short, we use `performance.now()` and `window.requestAnimationFrame()` to ensure tight control over stimulus presentation
times and accurate measurement of participant reaction. We enforce full screen mode for the duration of the training to minimise distractions and request that participants turn off any distractors (e.g. chat programs) that might intrude into full screen mode anyway. Additionally, we have taken care to minimise reflows and repaints, preloaded images and followed other best-practice guidelines. See these two Stackoverflow questions on ["Control and measure precisely how long an image is displayed"](https://stackoverflow.com/questions/14323792/control-and-measure-precisely-how-long-an-image-is-displayed/) and ["Capturing reaction times using Javascript, accuracy concerns"](https://stackoverflow.com/questions/13973321/capturing-reaction-times-using-javascript-accuracy-concerns) for further reading on the topic.

There is further documentation in the code in the form of comments. The language used is German, but all verbal chunks are stored separately and easily translatable.

The stimuli used for the training are not contained in this repository. Please confer Habedank, Lennartz, Arslan, and Ertle (submitted) for further information on obtaining them.

## Website
On the website, users can sign up and are automatically randomly assigned to the training or the placebo group.
The website registers who has trained how often and provides feedback on improvements in mean reaction time.
Email addresses are verified here, but most of the survey control was done using [formr](https://github.com/rubenarslan/formr.org/),
a free survey and study control software, which automated email invitations, progress monitoring and so on.