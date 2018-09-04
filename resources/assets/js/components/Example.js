import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route,Link } from 'react-router-dom';

import Home from './modules/Home';
import About from './modules/About';
import Repos from './modules/Repos';
import Topics from './modules/Topics';



export default class Example extends Component {
    render() {
        return (

            <Router>
              <div>
              <ul>
                <li><Link to="/">Home</Link></li>
                <li><Link to="/about">About</Link></li>
                <li><Link to="/topics">Topics</Link></li>
              </ul>

              <hr />


                <Route exact path="/" component={Home} />
                <Route path="/about" component={About} />
                <Route path="/topics" component={Topics} />
              </div>
            </Router>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
