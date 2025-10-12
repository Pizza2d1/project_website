#!/bin/bash

if [[ -z $1 ]]; then
  echo -e "Make sure to explicitly reference the file you want to add to as:\n\tadd_to_blog RSS.xml"
  exit;
fi


insert_blog_stuff() {
    for file in $(ls ~/htdocs/rss/*.md); do
        pandoc $file -f markdown -t plain --wrap=none -o temp.txt
        header=$(cat temp.txt | head -n 1)
        if [[ ${header:0:1} == '<' ]]; then
          title=$header
          file_data=$(cat temp.txt | tail -n +4)
        else
          title=$(echo $header | sed 's/##//')
          file_data=$(cat temp.txt | tail -n +2)
        fi
        date=$(stat -c '%w' $file | date -f - '+%a, %d %b %Y %H:%M:%S GMT')
        
        
        echo -e """    <item>""" >> "$1"
        echo -e """      <title>$title</title>""" >> "$1"
        echo -e """      <description>$file_data</description>""" >> "$1"
        echo -e """      <pubDate>$date</pubDate>""" >> "$1"
        echo -e """    </item>""" >> "$1"
    done
    rm temp.txt
}

echo """<?xml version=\"1.0\" encoding=\"UTF-8\" ?>""" > "$1"
echo """<rss version=\"2.0\"><channel>""" >> "$1"
echo """    <title>Pizza2d1's RSS Blog</title>""" >> "$1"
echo """    <link>https://pizza2d1.duckdns.org/blog/</link>""" >> "$1"
echo """    <language>en-us</language>""" >> "$1"
echo """    <description>This is where I go on rants about stupid stuff, not because I really care about what I talk about, but because I spent so much time learning about blogs and rss viewers/feeds that it feels necessary to at least put some stuff on here.</description>""" >> "$1"
insert_blog_stuff $1
echo "</channel></rss>" >> "$1"
