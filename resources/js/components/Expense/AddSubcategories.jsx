import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

export default class AddSubcategories extends Component {
    constructor(props) {
        super(props);

        // code
        this.state = {
            categories: JSON.parse(this.props.categories),
            subcategories: [],
            balance: "",
            errors: JSON.parse(this.props.errors)
        };

        console.log(this.props);
        console.log(this.state.subcategories);
        // console.log(Object.keys(this.state.errors).length);
    }

    subcategoryHandler = (e) => {
        axios
            .post(baseURL + "axios/getSubcategoriesById", {
                category_id: e.target.value,
            })
            .then((response) => {
                // update state
                this.setState({
                    subcategories: response.data,
                });

                console.log(response.data);
            })
            .catch((reason) => {
                console.log(reason);
            });
    };

    openingBalanceHandler = (e) => {
        // ajax
        axios.post(baseURL + "axios/getAllDeducts", { subcategory_id: e.target.value })
            .then((response) => {
                // update state
                this.state.subcategories.map((subcategory) => {
                    if (e.target.value == subcategory.id) {
                        this.setState({
                            balance: subcategory.opening_balance - Number(response.data),
                        });
                    }
                });

                console.log(response.data);
            })
            .catch((reason) => {
                console.log(reason);
            });
    };

    render() {
        return (
            <>
                <div className="mb-3 row">
                    <div className="col-md-2">
                        <label
                            htmlFor="category"
                            className="mt-1 form-label required"
                        >
                            Category
                        </label>
                    </div>

                    <div className="col-md-4">
                        <select
                            name="expenses_category_id"
                            defaultValue={""}
                            onChange={this.subcategoryHandler}
                            className="form-control"
                            id="category"
                            required

                        >
                            <option value="" disabled>
                                --
                            </option>
                            {this.state.categories.map((category, index) => (
                                <option value={category.id} key={index}>
                                    {category.name}
                                </option>
                            ))}
                        </select>

                        {/* error */}
                        <small className="text-danger">{ (Object.keys(this.state.errors).length > 0) ? this.state.errors.category[0] : '' }</small>
                    </div>
                </div>

                <div className=" row">
                    <div className="col-md-2">
                        <label
                            htmlFor="subcategory"
                            className="mt-1 form-label required"
                        >
                            Subcategory
                        </label>
                    </div>

                    <div className="col-md-3">
                        <select
                            name="expense_Subcategory_id"
                            onChange={this.openingBalanceHandler}
                            defaultValue={""}
                            className="form-control mb-3"
                            id="subcategory"
                            required

                        >
                            <option value="" disabled>
                                --
                            </option>
                            {this.state.subcategories.map(
                                (subcategory, index) => (
                                    <option value={subcategory.id} key={index}>
                                        {subcategory.name}
                                    </option>
                                )
                            )}
                        </select>

                        {/* error */}
                        <small className="text-danger">{ (Object.keys(this.state.errors).length > 0) ? this.state.errors.expense_Subcategory_id[0] : '' }</small>
                    </div>

                    <div className="col-md-3 form-group">
                        <input
                            name="opening_balance"
                            defaultValue={this.state.balance}
                            placeholder="0.00"
                            className="form-control"
                            readOnly
                        />
                        <small className="text-muted fst-italic">
                            Show opening balance
                        </small>
                    </div>
                </div>
            </>
        );
    }
}

// DOM element
if (document.getElementById("add-category-and-subcatigories")) {
    // find element by id
    const element = document.getElementById("add-category-and-subcatigories");

    // create new props object with element's data-attributes
    const props = Object.assign({}, element.dataset);

    // render element with props (using spread)
    ReactDOM.render(<AddSubcategories {...props} />, element);
}
