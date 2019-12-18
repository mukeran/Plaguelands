from flask import Flask, url_for, redirect, render_template, render_template_string

app = Flask(__name__)

@app.route('/template_inject/<name>')
def index(name):
    template = '<h1>hello {}!<h1>'.format(name)
    return render_template_string(template)

if __name__ == '__main__':
    app.run()
