import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class About extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                I'm an About component!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
