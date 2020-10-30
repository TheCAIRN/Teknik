Function definitions for Teknik SkillScript  
  
Each command will start on a new line. The general format of commands is:  
{"command",{{"parameter1a","parameter1b","parameter1c"},{"parameter2"}}}  
  
Comments, variable assignments, flow control, and function calls are all considered  
commands.  
Math functions including division or decimals are only accurate up to 14 decimal places,  
though a full 45 places are returned. Once bigmath is included, the accuracy will increase.  
  
Fundmental commands:  
"fefd0111001": Skill code. Matches the file name + ".tss".  
"fefd0111002": Creation date.  
"fefd0111003": Modified date. There may be multiple instances of this command in a file.  
"fefd0111004": Modified reason. There may be multiple instances of this command in a file.  
"fefd0111005": Description of skill.  
"fefd0111006": 7f code of "author".  
"fefeff00001": First (hex) parameter is..., takes a type as a parameter.  
"fefeff00002", etc.: Second (hex), etc. parameter is..., same as above.  
"fefe0300001": First (hex) variable is..., param 1 is the number, param 2 is an optional type  
"fefe0700001": First (hex) indexed array is...., param 1 is the array, param 2 is an optional array of  
types. If param 2 is passed, the array becomes a structure, and any assignment that violates  
the structure fails the skill with a type-check error.  
"fefefffffff": Assign a value (param 1) to the special return variable. If the function ends without  
returning anything, this variable will be automatically returned if defined. If not defined, void  
will be returned.  
"fe050151001": Return void. This skill has no return value.  
"fe050151002": Return 0.  
"fe050151003": Return "fefefffffff".  
"fe050151004": Return a variable or constant. Declare the name of the datum in param 1.  
"fe050151005": Return a value. Declare the value in param 1.  
"fe050151006": Return a sentence.  
  
Basic constants:  
These may be defined elsewhere in the Teknik Language Specification; but because the context is  
different, they will be redefined here. Examples include true, false, null, infinity, pi, etc.  
"fefe0111001": void  
"fefe0111002": null  
"fefe0111003": true  
"fefe0111004": false  
"fefe0111005": boolean indeterminant  
"fefe0111006": boolean irrelevant  
"fefe0111007": zero  
"fefe0111008": positive (>0)  
"fefe0111009": negative (<0)  
"fefe0121001": PI  
"fefe0121002": HALF_PI  
"fefe0121003": TWO_PI  
"fefe0131001": Speed of light (if units aren't sepecified, meters per second is used)  
"fefe0131002": Speed of sound through air  
"fefe0131003": Earth's gravitational constant  
"fefe0131004": Freezing point of water (if units aren't specified, celcius is used)  
"fefe0131005": Boiling point of water  
"fefe0131006": Absolute zero  
  
"fefeffffffd": A special variable indicating the error status of the last command.  
"fefeffffffe": A special variable indicating the resultant value of the last command.  
  
Errors:  
"feff1000000": No error  
"feff0111001": Malformed skill command.  
"feff0111002": Malformed command[1].  
"feff0111003": Internal skill does not exist.  
"feff0112001": Could not open skill file.  
"feff0112002": Malformed skill command in skill file (mismatched braces or quotes).  
"feff0112003": Malformed command in skill file (not a 2-element sequence).  
"feff0112004": Malformed command[1] in skill file.  
"feff1000001": Missing required parameter.  
"feff1000002": Required parameter is malformed.  
"feff1000003": Required parameter exists, but is the wrong type.  
"feff1000004": Numerical parameter is malformed.  
"feff1000005": Numerical parameter is not a number.  
"feff1000006": Zero is not a valid denominator / You cannot divide by zero.  
"feff1100001": Malformed variable name.  
"feff1100002": Requested variable is not initialized.  
"feff1100003": Requested variable is of the wrong type.  
  
Data manipulation:  
"fe050411001": Initialize a variable. Parm1=variable code, parm2=value, parm3=type  
"fe050411002": Uninitialize a variable. parm1=variable code  
"fe050411003": Retrieve the value of a variable. Parm1=source variable code,  
parm2=optional destination  
"fe050411004": Retrieve the variable code as a value. Parm1=source variable code,  
parm2=optional destination  
"fe050411005": Evaluate a value as a variable code. Parm1=value, parm2=optional destination to copy  
the value of the evaluated variable to.  
"fe050411006": Copy a value. Parm1=destination code, parm2=source  
"fe050412001": Compare two variables or values. Result is constant pos (p1 > p2), neg (p2 < p1),  
or zero (p1 == p2).  
"fe050412002": Check if two variables or values are identical. Result is boolean.  
"fe050412003": Check if two variables or values are congruent. Result is boolean.  
"fe050412004": Returns first instance of parm2 in parm1.  
"fe050412005": Returns next instance of parm2 in parm1.  
"fe050412006": Returns last instance of parm2 in parm1.  
"fe050511001": Length of an array. Parm1=variable code  
"fe050521001": Repeat a value x times. Parm1=destination variable code, parm2=value, parm3=count  
"fe050521002": Reverse an array. Parm1=source, parm2=optional destination. If parm2 is absent,  
the reversal is stored in parm1. This holds true for all indexed array operations except repeat.  
"fe050521003": Append a value to an array. Parm1=source, parm2=value, parm3=optional destination.  
"fe050521004": Prepend a value to an array. Parm1=source, parm2=value, parm3=optional destination.  
"fe050521005": Insert a value at index x. Parm1=source, parm2=value, parm3=index (base 1, 0=prepend),  
parm4=optional destination  
"fe050521006": Remove a value at index x. Parm1=source, parm2=index (base 1), parm3=optional destination  
"fe050521007": Splice an array. Parm1=source, parm2=start index, parm3=stop index (-1=end),  
parm4=optional destination  
"fe050521008": Vertical slice. Parm1=source, parm2=start index, parm3=stop index, parm4=vertical index,  
parm5=optional destination  
"fe050521009": Sort the array by column x. Parm1=source, parm2=column #, parm3=optional dest.  
"fe050531001": Count the instances of a hash value. Parm1=source, parm2=hash value  
"fe050531002": Clear all instances of a hash value. Parm1=source, parm2=hash value,  
parm3=optional destination  
  
Math skills:  
"fe050311001": Square root  
"fe050311002": Random seed  
"fe050311003": Random number, parm1=lower bound, parm2=upper bound  
"fe050311004": sine, parm1 in radians if not specified.  
"fe050311005": cosine  
"fe050311006": tangent  
"fe050311007": arcsine, parm1=value, parm2=optional units (radians by default)  
"fe050311008": arccosine  
"fe050311009": arctangent  
"fe05031100a": natural logarithm  
"fe05031100b": base10 logarithm  
"fe050211001": logical inverse  
"fe050211002": additive inverse  
"fe050211003": multiplicative inverse  
"fe050211004": increment  
"fe050211005": decrement  
"fe050211006": double  
"fe050211007": half  
"fe050221001": Add  
"fe050221002": Subtract  
"fe050221003": Multiply  
"fe050221004": Divide  
"fe050221005": Modulo  
"fe050221006": Exponent  
"fe050221c01": Complex add  
"fe050221c02": Complex subtract  
"fe050221c03": Complex multiply  
"fe050221c04": Complex divide  
"fe050222001": Is equal to (returns boolean or array of booleans)  
"fe050222002": Is not equal to  
"fe050222003": Is greater than  
"fe050222004": Is greater than or equal to  
"fe050222005": Is less than  
"fe050222006": Is less than or equal to  
"fe050223001": Logical AND  
"fe050223002": Logical OR  
"fe050223003": Logical NOT  
"fe050223004": Logical XOR  
"fe050223005": Logical NAND  
"fe050223006": Logical NOR  
"fe050223007": Logical NXOR  
"fe050224001": Bitwise AND  
"fe050224002": Bitwise OR  
"fe050224003": Bitwise NOT  
"fe050224004": Bitwise XOR  
"fe050224005": Bitwise NAND  
"fe050224006": Bitwise NOR  
"fe050224007": Bitwise NXOR  
"fe050231001": Parm1=boolean,Parm2=return if true,Parm3=return if false  
