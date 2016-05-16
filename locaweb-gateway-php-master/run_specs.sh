#!/usr/bin/env bash
ls specs/*.php | awk '{print "echo "$1": ;phpspec "$1}' | sh
