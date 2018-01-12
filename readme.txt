--- PHP Coding Formats ---

Variables:

Strings --> $sVariable
Integers--> $iVariable
Arrays  --> $aVariable
     .		    .
     .          .	

--------------------------------------------------------------------------------------------------------------------
Create your files in the directory that relevant. 
-Ex: create student.php in src/front-end
Use style files for relevant pages.
-Ex: create student.css file in src/css directory for student.php and write your <style>XXX</style> codes in there.

Write your codes simple and understandable and use indentation. Atom-beautify can be used.
--------------------------------------------------------------------------------------------------------------------

--- COMMITTING ---

DO NOT commit like: 'git add .'
You SHOULD use like: 'git add src/front-end/login.php src/css/login.css'

Follow these; 

Get a list of files you want to commit

$ git status

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

modified:   file1
modified:   file2
modified:   file3
modified:   file4

Add the files to staging

$ git add file1 file2
Check to see what you are committing

$ git status

Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

    modified:   file1
    modified:   file2

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

    modified:   file3
    modified:   file4
Commit the files with a commit message

$ git commit -m "Fixed files 1 and 2"

If you accidentally commit the wrong files

$ git reset --soft HEAD~1
If you want to unstage the files and start over

$ git reset

Unstaged changes after reset:
M file1
M file2
M file3
M file4
