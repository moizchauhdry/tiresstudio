#!/bin/bash

# Backup the crontab
crontab -l > crontab.bak

# Regular expression to match 5-minute cron jobs (basic)
five_min_cron_regex='^\s*\*/5\s'

# Temporary array to store lines to be kept
keep_lines=()

while read line; do
  if [[ ! $line =~ $five_min_cron_regex ]]; then
    keep_lines+=("$line")
  fi
done < crontab.bak

# Install the modified crontab
printf "%s\n" "${keep_lines[@]}" | crontab -

# Remove temporary file
rm crontab.bak

echo "cron removed"
