import MySQLdb
import sys

# connect to db
db = MySQLdb.connect("nevrdb.cfpwtz0jnnuo.us-west-2.rds.amazonaws.com", "nevr", "Nevr242!", "nevr");

# setup cursor
cursor = db.cursor();

# get sql query
sql = raw_input("Enter your MySQL query:\n");

# execute sql
cursor.execute(sql)

# print results
print cursor.fetchall()

# close the connection to the db
db.close()


