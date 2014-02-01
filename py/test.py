#!/usr/bin/env python
import html
import cgi
import cgitb; cgitb.enable()     # for troubleshooting

print("Content-Type: text/html") # HTTP header to say HTML is following
print()                          # blank line, end of headers

form = cgi.FieldStorage()
item_name  = html.escape(form["item_name"].value);
#item_price   = html.escape(form["item_price"].value);

print(item_name)


