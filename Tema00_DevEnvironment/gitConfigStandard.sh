#!/bin/bash

#1. Init the git
git init

#2. Add remote repository
git remote add origin git@github.com:JustTheDude001/FullStackSprint01.git

#Add everything in the folder to the repository
git add ./*

#Commit what will be uploaded with a message
git commit -m "My First Commit To Test"

#Determine the branch of the prroject
git branch -M main

#Done Above
#git remote add origin git@github.com:JustTheDude001/FullStackSprint01.git

#Push the commit using the user origin and the branch main
git push -u origin main

#Other git commands:

#git branch -l
#list branches

#git diff --stat --cached

#git clone git@github.com:JustTheDude001/FullStackSprint01.git

