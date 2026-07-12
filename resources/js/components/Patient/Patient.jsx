import React, { Component } from 'react'
import ReactDOM from "react-dom";
import Select from 'react-select';
import axios from 'axios';

export default class Patient extends Component {
    constructor(props) {
        super(props);

        // state 
        this.state = {
            testgroups: JSON.parse(this.props.testgroups),
            tests: JSON.parse(this.props.tests),
            // tests: [],
            currentlySelectedTest: null,
            selectTests: [],
            testsSubtotal: 0,
            discount: 0,
            discountType: "Percentage",
            discountAmount: 0,
            total: 0,
            paid: 0,
            dueOrChange: 0,
            dueOrChangeStatus: 'Due',
            singleDiscountAmount: 0,
            
        };

        console.log(this.state.testsSubtotal);
        // console.log(this.state.tests);
        // console.log(this.props);
    }

    testHandler = (e,) => {
        console.log(e.target.value,);
        this.gettest(e.target.value,);
    }

    gettest(id) {
        axios
            .post(baseURL + "axios/gettestById", {
                test_group_id: id,
            })
            .then((response) => {
                // update state
                this.setState({
                    tests: response.data,
                });

                console.log(response.data);
            })
            .catch((reason) => {
                console.log(reason);
            });
    }

    selectHandaler = (test) => {
        const selectedTests = [...this.state.selectTests]

        selectedTests.push(test)

        this.setState({
            selectTests: selectedTests
        }, () => {
            this.calculateTestsSubtotal()
        })
    }

    removeTest = (index) => {
        const selectedTests = [...this.state.selectTests]
        selectedTests.splice(index, 1)
        this.setState({
            selectTests: selectedTests
        }, () => {
            this.calculateTestsSubtotal()
        })

    }
    singleDiscountHandler = (selectTest, discount, index) => {

            const discountAmount = selectTest.price * (discount / 100)

            const selectedTests = [...this.state.selectTests]

            selectedTests[index] = {
                ...selectTest,
                lineTotal: selectTest.price - discountAmount
            }

            this.setState({
                selectTests: selectedTests
            }, this.calculateTestsSubtotal);
    }

    calculateTestsSubtotal = () => {

        // TODO: calculate value
        const subtoal = this.state.selectTests.reduce((sum, test) => {
            return sum + parseFloat(test.lineTotal || test.price)
        }, 0)

        this.setState({
            testsSubtotal: subtoal
        }, this.getDiscountAmount);
    }
    

    discountTypeHandler = (e) => {
        this.setState({
            discountType: e.target.value
        }, this.getDiscountAmount);
    }

    
    discountHandler = (e) => {
        this.setState({
            discount: e.target.value
        }, this.getDiscountAmount);
    }

    getDiscountAmount = () => {
        if (this.state.discountType === 'Percentage') {
            this.setState({
                discountAmount: (this.state.testsSubtotal * this.state.discount) / 100
            }, this.getGrandtotal);
        } else {
            this.setState({
                discountAmount: this.state.discount
            }, this.getGrandtotal);
        }
    }
    
    getGrandtotal = () => {
        this.setState({
            total: (this.state.testsSubtotal - this.state.discountAmount)
        }, this.getTotalPaid);
    }

    paidHandler = (e) => {
        this.setState({
            paid: e.target.value
        }, this.getTotalPaid);
    }

    getTotalPaid = () => {
        this.setState({
            dueOrChange: this.state.total - this.state.paid
        }, () => {
            if (this.state.dueOrChange >= 0) {
                this.setState({ dueOrChangeStatus: 'Due' })
            } else {
                this.setState({ dueOrChangeStatus: 'Change' })
            }

        });

    }

    render() {
        return (

            <>
                <div className="row">
                    <div className="col-md-2">
                        <label htmlFor="patient-amount" className="mt-1 form-label ">Test Group</label>
                    </div>

                    <div className="col-md-3">
                        <select name="test_group_id" className="form-control" id="test_group" onChange={(e) => this.testHandler(e,)} >
                            <option value="" >---</option>
                            {this.state.testgroups.map((testgroup, index) => (
                                <option value={testgroup.id} key={index}>
                                    {testgroup.title}
                                </option>
                            ))}
                        </select>
                    </div>


                </div> 

                <div className="row mt-3">
                    <div className="col-md-2">
                        <label htmlFor="patient-amount" className="mt-1 form-label required">Test</label>
                    </div>

                    <div className="col-md-5">
                        {/* <select name="" id="" className=''>
                        <option value="">---</option>
                    </select> */}
                        <Select name="test_id"
                            id="test-id"
                            required
                            getOptionLabel={(test) =>
                                test.title
                            }
                            getOptionValue={(test) => test.id}
                            // isMulti={true}
                            // value={this.state.select.value}
                            options={this.state.tests}
                            onChange={this.selectHandaler}
                        />
                    </div>
                    {/* <div className="col-md-1">
                    <button type='button' className='btn btn-success' onClick={this.addClickHandler}><i className="bi bi-plus-square"></i> Add</button>
                </div> */}

                </div>



                <div className="mb-3 mt-3 row">
                    <div className="col-md-7">
                        <div className="row">
                            <div className="col-lg-3"></div>
                            <div className="col-lg-9">
                                <table className='table'>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Test name</th>
                                            <th className='text-end'>Price</th>
                                            <th className='text-end'>Discount(%)</th>
                                            <th className='text-end'>line Total</th>
                                            <th className='text-end'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {this.state.selectTests.map((selectTest, index) => (
                                            <tr key={index}>

                                                <th>
                                                    {index + 1}.
                                                    <input hidden type="text" name="test_id[]" defaultValue={selectTest.id} />
                                                </th>
                                                <td>{selectTest.title}</td>
                                                <td className='text-end'>{selectTest.price}</td>
                                                <td className='text-end'>
                                                    <input type="number"
                                                        name="test_discount[]"
                                                        className='form-control text-end'
                                                        placeholder={selectTest.discount}
                                                        max={selectTest.discount}
                                                        min='0'
                                                        defaultValue={0}
                                                        onChange={(e) => this.singleDiscountHandler(selectTest, e.target.value, index)}
                                                        disabled={(selectTest.discount) < '1'}
                                                        
                                                    />
                                                </td>
                                                <td className='text-end'>{parseFloat(selectTest.lineTotal || selectTest.price).toFixed(2)}</td>
                                                <td className='text-end'>
                                                    <button type='button' className='btn btn-sm text-danger' onClick={() => this.removeTest(index)}><i className="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-5">
                        <div className="row">
                            <div className="col-lg-1"></div>
                            <div className="col-lg-10">
                                <h5>Calculation</h5>
                                <div className="row">
                                    <div className=' col-lg-6'>
                                        <label htmlFor="" className='form-label'>Subtotal</label>
                                    </div>
                                    <div className=' col-lg-6'>
                                        <input readOnly className='form-control text-end' name='subtotal' value={this.state.testsSubtotal} type="text" />
                                    </div>
                                </div>
                                <div className="row mt-2">
                                    <div className=' col-lg-5'>
                                        <label htmlFor="" className='form-label'>Discount</label>
                                    </div>
                                    <div className=' col-lg-7'>
                                        <div className='input-group'>
                                            <span id='discount' aria-describedby="amount-addon" >
                                                <select name="discount_type" id="" defaultValue={this.state.discountType} className='form-control' onChange={this.discountTypeHandler}>
                                                    <option value="Percentage">Percentage (%)</option>
                                                    <option value="flat">Flat</option>
                                                </select>
                                            </span>
                                            <input name="discount" defaultValue={this.state.discount} onChange={this.discountHandler} onBlur={this.discountHandler} className='form-control text-end' id='discount' type="text" placeholder='0.00' />
                                        </div>
                                    </div>
                                </div>
                                <div className="row mt-2">
                                    <div className=' col-lg-6'>
                                    </div>
                                    <div className=' col-lg-6 text-end'>
                                        <span className='form-label'>{this.state.discountAmount}</span>
                                    </div>
                                </div>
                                <div className="row mt-2">
                                    <div className=' col-lg-6'>
                                        <label htmlFor="" className='form-label'>Total</label>
                                    </div>
                                    <div className=' col-lg-6'>
                                        <div className='input-group'>
                                            <input readOnly value={this.state.total} className='form-control text-end' id='discount' type="text" placeholder='0.00' />
                                        </div>
                                    </div>
                                </div>
                                <div className="row mt-2">
                                    <div className=' col-lg-6'>
                                        <label htmlFor="" className='form-label'>Paid</label>
                                    </div>
                                    <div className=' col-lg-6'>
                                        <div className='input-group'>
                                            <input className='form-control text-end' type="text" name="paid" value={this.state.paid} onChange={this.paidHandler} onBlur={this.paidHandler} step="any" />
                                        </div>
                                    </div>
                                </div>
                                <div className="row mt-2">
                                    <div className=' col-lg-6'>
                                        <label htmlFor="" className='form-label'>{this.state.dueOrChangeStatus}</label>
                                    </div>
                                    <div className=' col-lg-6 text-end'>
                                        <span>{this.state.dueOrChange}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        )
    }
}

// DOM element 
if (document.getElementById("patient-test")) {
    // find element by id
    const element = document.getElementById("patient-test");

    // create new props object with element's data-attributes
    const props = Object.assign({}, element.dataset);

    // render element with props (using spread)
    ReactDOM.render(<Patient {...props} />, element);
}
