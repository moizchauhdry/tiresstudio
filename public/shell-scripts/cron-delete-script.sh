#!/bin/bash

# Backup the crontab
crontab -l > crontab.bak

# Regular expression to match 5-minute cron jobs
five_min_cron_regex='^\s*\*/5\s'

# Temporary file for modified crontab
temp_crontab=""

while read line; do
  if [[ ! $line =~ $five_min_cron_regex ]]; then
    echo "$line" >> $temp_crontab
  fi
done < crontab.bak

# Install the modified crontab
crontab < $temp_crontab

# Remove temporary files
rm crontab.bak $temp_crontab

echo "cron removed"
