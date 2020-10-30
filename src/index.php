<html>
<head>
<title>About Teknik</title>
</head>
<body>
Welcome to the Teknik Language Specification.  The project is hosted on Sourceforge, and has been somewhat dormant for most of its life.  It's mostly a hobby now, rather than serious research, or a project that has any commercial interest left.  With the advent of Watson, Siri, and similar AI bots, the capability of one man is too small to compete.  <br /><br />
So why am I still doing this?  Well, it's fun, first of all.  And there are some key areas in existing research that make another solution worth looking into.  The first is the hardware requirement.  Current implementations require almost super-computing resources to handle the brute force methods.  I still believe there are ways to accomplish the same goals using commodity hardware.  Second, these utilities are very generic, and have a hard time remembering context (partly due to their centralized infrastructure).  If I tell a bot that I'm playing tennis with Chris on Tuesday at 4pm, I have certain expectations if I reference that appointment later.  If I say to move the game to Thursday, the bot should know I'm talking about the tennis game, and should automatically update both the appointment and send a message to Chris about the change.  This type of context sensitive understanding is beyond the present level of technology. <br /><br />

So here's my to-do list for this PHP version:<br />
<ol>
<li>Continue updating the translation libraries from Euphoria to PHP.</li>
<li>Convert the Teknik Shell Script module to PHP.</li>
<li>Incorporate WordNet lookup using http://www.a2zdefined.com/dictionary/$word.</li>
<li>Incorporate Wikipedia lookup using offline encyclopedia.</li>
</ol>
<br /><br />
Here are the performance objectives:<br />
<ol>
<li>Report the percentage of text that can be translated word for word.</li>
<li>Show the interleved translated text for analysis.</li>
<li>Show the number of newly learned words when given a passage, with a report of what those words are.</li>
<li>Be able to answer analogy questions in the form $w1:$w2::$w3:?.</li>
</ol>
<br /><br />
</body>
</html>

