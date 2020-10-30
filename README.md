# Teknik
Code, database files, and descriptions for the Teknik Language Specification

## Background

This project was initially conceived in 1993 by Michael Sabal as an answer to the challenge of creating Natural Language Understanding (NLU) algorithms on commodity hardware.  Even two decades into the 21st century A.D., many natural language tasks require long runtimes on hardware with powerful CPUs and large amounts of free RAM.  At the time the project began, the dominant source of natural language data was WordNet, focusing on the problem of word sense disambiguation.  To date, this remains a challenge in NLU, with large neural network algorithms adapting Long Short-Term Memory (LTSM) to determine the meaning of specific words.

Teknik approaches the problem of NLU from a different assumption.  Rather than trying to approach the task as a native speaker, as GPT-3 and BERT do, Teknik recognizes that human languages are as foreign to the computer as they are to a speaker from another country.  To bridge that gap, Teknik is a language more appropriate to the tasks CPUs are good at: manipulating and parsing numbers in a hierarchical format.

The Teknik project has gone through a number of iterations, most recently using a MySQL database to handle the cross-reference and lookup tasks for the translation function.  Originally written with the Euphoria programming language, most of the code has been ported to PHP due to its superior string handling functionality, and its ability to directly interact with the World Wide Web.  Before moving to GitHub, the descriptions of Teknik were hosted on https://hickoryservices.com.

The details of Teknik's structure can be found in the /docs directory of this repository.

## Current Goals

Besides the task of building out the metalanguage itself, having a computer understand language is merely academic unless it can put the language to work.  Part of Teknik's core is the ability for the program to create its own algorithms, using its own language, as Skill Scripts.  This concept is still in its infancy, but can provide the basis for proving the effectiveness of NLU.  Furthermore, Teknik Skill Scripts can be evaluated by human moderators to better understand how the machine is applying its learning to real world tasks; something presently absent from neural network approaches.

To that end, here is the list of tasks I would like to see completed next.
* Create a data set of word problems, at the second grade (elementary) level, in at least 10 different human languages.  The data set should include the problems, the language code, and the answer.
* Verify that all common words in the problems have a Teknik definition.
* Complete the translation functions to convert the human language to Teknik.  Words problems simply translated from one human language to another should resolve to the same Teknik.
* Create Teknik Skill Scripts (manually) to solve the various problem types.
* Create processing logic to identify which skill script is needed, and pass the appropriate parameters.
* Create a process for identifying knowledge or language the system does not yet know or understand.
