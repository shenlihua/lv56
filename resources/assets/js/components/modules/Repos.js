import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Repos extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                I'm an Repos component!
                            </div>
                            <div>
                                {this.props.children || "Welcome to your Inbox"}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
