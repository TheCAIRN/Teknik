************************ Teknik Language Specification ************************  
****************************** Topic Definitions ******************************  
  
*1* A Teknik word consists of 20 characters:  
  
*1.1* '7' indicates a question word  
'8' indicates an expression whose head must agree  
'9' indicates an expression that doesn't change  
'a' indicates an abstract word or concept (love, think)  
'b' indicates a prefix (beginning)  
'c' indicates a concrete word or concept (apple, add)  
'd' indicates a stock phrase (How are you?, I'm fine)  
'e' indicates a suffix (ending)  
'f' is N/A or unknown  
  
*1.2* Part of speech  
1 = noun  
2 = verb  
3 = adjective (or determiner)  
4 = adverb  
5 = preposition  
6 = conjunction  
7 = interjection  
8 = question word  
9..c = undefined  
d = stock phrase  
e = punctuation  
f = N/A or unknown  
  
*1.3* Specific parts of speech:  
Noun:  
1 = count  
2 = noncount  
3 = proper noun  
4 = pronoun  
5 = possessive noun  
6 = possessive pronoun  
Verb:  
0 = intransative  
1 = either vi or vt  
2 = vt. requires a proper noun  
3 = vt. requires any noun  
4 = requires adjective  
5 = requires gerund  
6 = requires infinitive (may have separate subj.)  
7 = requires a relative clause w/separate subj.  
8 = requires both a direct and indirect object  
9 = requires a quotation  
a = requires a quotation and indirect object  
b = requires a relative clause whose subj is the primary verb's DO  
c = requires a quantity (absolute or circumlocutious)  
d = auxiliary verb  
e = modal auxiliary  
Adjective:  
1 = simple adjective  
2 = article  
3 = number  
4 = proper possessive adj.  
5 = possessive pronoun adj.  
6 = capitalized adj. (e.g.,days of the week)  
Adverb:  
1 = transitional adv.  
2 = sentence adv.  
3 = central adv.  
4 = adv-->verb at end of sent.  
5 = adv-->adj.  
6 = adv-->adv.  
7 = adv. of motion (home, upstairs, east)  
8 = adv. of time (everyday)  
9 = adv. of frequency (always)  
a = phrasal verb adv.  
Preposition:  
1 = preposition of location (in, on, next to)  
2 = preposition of motion (to, up, down)  
3 = preposition of time (at, before, after)  
4 = preposition of relation (with, by)  
Conj:  
1 = local (This and that)  
2 = verb (ate and ran)  
3 = sentence (He did this and she did that)  
4 = conditional (If/when)  
5 = subordinate (while)  
  
*1.4* Gender agreement | specificity agreement  
1 = male  
2 = female  
3 = neuter  
+0 = animate/specific  
+3 = inanimate/specific  
+6 = animate/general  
+9 = inanimate/general  
f = N/A or unknown  
  
*1.5* Number agreement - changed 9/13/2006 to allow negative verbs  
1 = neg. /I/ verb or singular noun  
2 = neg. /You/ verb  
3 = neg. /He.../ verb  
4 = /I/ verb or singular noun  
5 = /You 1/ verb  
6 = /He.../ verb  
7 = /We/ verb or double noun  
8 = /You all/ verb  
9 = /They/ verb or plural noun  
a,b = undefined  
c = neg. /We/ verb or double noun  
d = neg. /You all/ verb  
e = neg. /They/ verb or plural noun  
f = N/A or unknown  
  
*1.6* Case agreement  
Noun/Adjective:  
1 = NOM: subjective  
2 = ACC: direct objective  
3 = DAT: indirect objective  
4 = prepositional  
5 = LOC(1): locative (in motion)  
6 = GEN: possessive  
7 = LOC(2): locative (stationary)  
8 = INS: instrumental (with x)  
9 = VOC: vocative, form of address  
Verb:  
1 = plain  
2 = gerund  
3 = infinitive  
4 = conditional  
5 = command  
6 = passive  
7 = perfect  
8 = (be able to)  
9 = (have to)  
a = adjectival  
e = subj+plain verb contraction  
  
*1.7* Tense marker  
1 = present  
2 = future  
3 = past  
4 = double future  
5 = double past  
6 = completed future  
7 = completed past  
8 = immediate present  
9 = past --> now  
a = experiential  
f = N/A or unknown  
  
*1.8* Participle marker  
0 = state of being  
1 = simple  
2 = progressive  
3 = perfect  
4 = perfect progressive  
+5 = motion  
  
*1.9* Formality byte  
0 = erroneous  
1 = obscene  
2 = very rude  
3 = slightly rude  
4 = informal (close friends)  
5 = casual (family & acquaintances)  
6 = polite (strangers & business)  
7 = very polite (the boss)  
8 = double formal  
9 = triple formal  
a = 4x formal  
c = technical low  
d = technical high  
e = archaic  
f = N/A or unknown  
  
*** indices 10..20 (base 1) define the word, where the above define its  
*** position in the language.  
  
*** 1.10,11 define the general topic  
*** 1.12,13 define subtopic I  
*** 1.14,15 define subtopic II  
*** 1.16 defines subtopic III  
*** 1.17 defines subtopic IV  
*** 1.18-20 define the actual meaning (or in some cases, value)  
  
*2* A Teknik sentence contains 7 elements:  
  
*2.1* Primary verb phrase  
* A verb phrase consists of the primary action (or state) first, then  
all modifiers following from the most to least significant (if  
applicable).  
* If more than one primary action is indicated, a sequence of strings  
will be stored in the first location.  
*2.2* Primary subject phrase  
* The subject phrase states the doer directly, followed by the most  
significant modifiers  
*2.3* Primary direct object - as above  
*2.4* Primary indirect object - as above  
*2.5* Time reference, if any.  
* The time reference could be a simple adverb, or a subordinate clause.  
*2.6* Direction reference, if any  
*2.7* Location reference, if any  
  
*** Prepositional phrases are examined as subj. --> prep. --> obj.  
*** Gerunds and infinitives are examined as direct objects or significant  
modifiers. e.g., "A fat man wearing a tall hat should be standing in the  
corner." --> (teknik codes would of course be substitued here -- this  
is only to show order): {{be+standing,should},{man(gen) fat wearing  
hat(gen) tall},{},{},{now+future},{},{in corner(spec)}}  
    
