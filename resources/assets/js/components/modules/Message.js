import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Message extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                I'm an Message component!
                            </div>

                            <div className="card-body">
                                <h3>Message {this.props.params.id}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
