from flask import Flask, render_template, request, session, redirect, url_for
import flask_mysqldb, werkzeug.security
import BakerStreetBoys as bsb

# Load our credentials
mysql_cred = bsb.mysql.get_cred()
secret_key = bsb.general.get_secret_key()["secret_key"]

# Initialize
app = Flask(__name__)
# Config Directives
app.config["MYSQL_USER"] = mysql_cred["user"]
app.config["MYSQL_PASSWORD"] = mysql_cred["password"]
app.config["MYSQL_DB"] = mysql_cred["database"]
app.config["MYSQL_HOST"] = mysql_cred["host"]
app.secret_key = secret_key

mysql = flask_mysqldb.MySQL(app)

@app.route('/')
def home():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM topics')
    raw_topics = cur.fetchall()
    cur.close()
    topics = [x[1] for x in raw_topics]
    return(render_template('home.html',
                                 topics = topics))

@app.route('/user/')
def user():
    return('User')

@app.route('/topic/<topic_name>/')
def topic(topic_name=None):
    return(render_template('topic.html', topic_name=topic_name.upper()))

@app.route('/search/<query>/')
def search(query=None):
    return(render_template('search.html', query=query.lower()))

@app.route('/login/', methods=['GET','POST'])
def login():
    # Post requests indicate a login attempt
    if (request.method == 'POST'):
        # If username and password aren't both set, then it's a bad request
        if ('username' not in request.form or 'password' not in request.form):
            return('Bad request - you must send a uname and pw')
        username = request.form['username']
        password = request.form['password']
        
        # The next line will be used in user password creation:
        #hashed_password = werkzeug.security.generate_password_hash(password)
        ####################################
        # Verify them against the database
        ####################################
        # First, get the hashed password from the database
        cur = mysql.connection.cursor()
        cur.execute('SELECT hashed_password FROM users WHERE username = \'' + username + '\'')
        result = cur.fetchall()
        cur.close()
        # Check that we got a result (i.e. that the username exists)
        if len(result) == 1:
            # Check that the password checks out
            hashed_password = str(result[0][0])
            if werkzeug.security.check_password_hash(hashed_password, password):
                # Then set the session username
                session['username'] = request.form['username']
                #session['user_id'] = user_id
                return('success!')
        return('authentiation probz')

    # If the user is already logged in
    return(render_template('login_unauth.html'))
    if ('username' in session):
        return("You're logged in as " + session['username'])
    else:
        return(render_template('login_unauth.html'))
        

@app.route('/logout/')
def logout():
    session.pop('username', None)
    return(redirect(url_for('home')))
    
