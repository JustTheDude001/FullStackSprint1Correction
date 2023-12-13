#!/bin/bash
ssh-keygen -t rsa -C "acerwork001@proton.me"

ssh-add ~/.ssh/id_rsa

ssh-add -l

#git remote set-url origin ssh://git@github.com/JustTheDude001/FullStackSprint01.git
