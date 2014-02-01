#!/usr/bin/python

import json
import sys
import os
import getopt
import MySQLdb

def process_json(json_data):
	for line in json_data["items"]:
		sql = "INSERT INTO items (name, category) VALUES ('" + line["name"] + "', '" + line["category"] + "')"
		cursor.execute(sql)

def process_csv(csv_data):
	print "Processing CSV file!"


# Grab file name and its extension from the command line argument
data_file, file_extension = os.path.splitext(sys.argv[1])

file_object = open(data_file + file_extension)

# Connect to DB
db = MySQLdb.connect("nevrdb.cfpwtz0jnnuo.us-west-2.rds.amazonaws.com", "nevr", "Nevr242!", "nevr")

# Set up cursor object
cursor = db.cursor()

if file_extension == ".json":
	json_data = json.load(file_object)
	process_json(json_data)

elif file_extension == ".csv":
	process_csv("hi")
