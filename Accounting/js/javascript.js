var t_accounts = '';
var trial_balance = [];
var net_income = 0;
var end_capital = 0;
var entries = [
    {
        Date: '1-jan',
        Dr: 'Cash',
        Cr: 'Common Stock',
        DrMoney: '10000',
        CrMoney: '10000'
    },
    {
        Date: '1-feb',
        Dr: 'Leasehold Improvements',
        Cr: 'Long-term Liabilities',
        DrMoney: '100000',
        CrMoney: '100000'
    },
    {
        Date: '15-feb',
        Dr: 'Inventory',
        Cr: 'Accounts Payable',
        DrMoney: '50000',
        CrMoney: '50000'
    },
    {
        Date: '1-March',
        Dr: 'Rent Expenses',
        Cr: 'Cash',
        DrMoney: '500',
        CrMoney: '500'
    },
    {
        Date: '15-March',
        Dr: 'Cash',
        Cr: 'Revenues',
        DrMoney: '500',
        CrMoney: '500'
    },
    {
        Date: '15-March',
        Dr: 'COGS',
        Cr: 'Inventory',
        DrMoney: '100',
        CrMoney: '100'
    },
    {
        Date: '1-April',
        Dr: 'Account Receivable',
        Cr: 'Revenues',
        DrMoney: '300',
        CrMoney: '300'
    },
    {
        Date: '1-April',
        Dr: 'COGS',
        Cr: 'Inventory',
        DrMoney: '100',
        CrMoney: '100'
    },
    {
        Date: '15-April',
        Dr: 'Utility Expenses',
        Cr: 'Cash',
        DrMoney: '200',
        CrMoney: '200'
    },
    {
        Date: '30-April',
        Dr: 'Supplies Expenses',
        Cr: 'Cash',
        DrMoney: '500',
        CrMoney: '500'
    },
    {
        Date: '15-May',
        Dr: 'Wages Expenses',
        Cr: 'Cash',
        DrMoney: '500',
        CrMoney: '500'
    },
    {
        Date: '30-May',
        Dr: 'Accounts Payable',
        Cr: 'Cash',
        DrMoney: '1000',
        CrMoney: '1000'
    },
    {
        Date: '1-June',
        Dr: 'Cash',
        Cr: 'Revenues',
        DrMoney: '2000',
        CrMoney: '2000'
    },
    {
        Date: '30-June',
        Dr: 'Long-term Liabilities',
        Cr: 'Cash',
        DrMoney: '1000',
        CrMoney: '1000'
    },
    {
        Date: '30-June',
        Dr: 'Interest Expenses',
        Cr: 'Cash',
        DrMoney: '500',
        CrMoney: '500'
    },
    {
        Date: '30-Nov',
        Dr: 'Cash',
        Cr: 'Revenues',
        DrMoney: '25000',
        CrMoney: '25000'
    },
    {
        Date: '30-Nov',
        Dr: 'COGS',
        Cr: 'Inventory',
        DrMoney: '10000',
        CrMoney: '10000'
    },
    {
        Date: '15-Dec',
        Dr: 'Dividends',
        Cr: 'Cash',
        DrMoney: '1000',
        CrMoney: '1000'
    }
];
var inputs = document.getElementsByTagName('input');
function addentries() {
    var date = document.getElementById('date').value;
    var dr = document.getElementById('dr').value;
    var cr = document.getElementById('cr').value;
    var drm = document.getElementById('drm').value;
    var crm = document.getElementById('crm').value;

    //if(date != "" && dr != "" && cr != "" && drm != "" && crm != "") {
    var entry = { Date: date, Dr: dr, Cr: cr, DrMoney: drm, CrMoney: crm };

    entries.push(entry);

    console.log(entries);
    addTr();
    clearForm();
    gen_t();
    //}
}

function clearForm() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
}
function addTr() {
    var trs = '';

    for (var i = 0; i < entries.length; i++) {
        trs +=
            `<tr>
                    <td rowspan="2" >` +
            entries[i].Date +
            `</td>
                    <td class="text-left">` +
            entries[i].Dr +
            `</td>
                    <td>` +
            entries[i].DrMoney +
            `</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-right">` +
            entries[i].Cr +
            `</td>
                    <td></td>
                    <td>` +
            entries[i].CrMoney +
            `</td>
                </tr>`;
    }

    $('#tableBody').html(trs);
}

function gen_t() {
    var accounts_name = [''];
    t_accounts = '';
    trial_balance = [];
    for (let i = 0; i < entries.length; i++) {
        var dr_exist = 0;
        var cr_exist = 0;
        var name = '';

        for (let m = 0; m < accounts_name.length; m++) {
            if (entries[i].Dr == accounts_name[m]) {
                dr_exist = 1;
            }
        }

        if (dr_exist == 0) {
            name = entries[i].Dr;

            let balance = {
                dr: [],
                cr: [],
                dr_date: [],
                cr_date: []
            };

            for (let n = 0; n < entries.length; n++) {
                if (entries[i].Dr == entries[n].Dr) {
                    balance.dr.push(entries[n].DrMoney);
                    balance.dr_date.push(entries[n].Date);
                }
                if (entries[i].Dr == entries[n].Cr) {
                    balance.cr.push(entries[n].CrMoney);
                    balance.cr_date.push(entries[n].Date);
                }
            }
            accounts_name.push(name);
            t_acc(balance, name);
        }
        for (let m = 0; m < accounts_name.length; m++) {
            if (entries[i].Cr == accounts_name[m]) {
                cr_exist = 1;
            }
        }
        if (cr_exist == 0) {
            name = entries[i].Cr;
            let balance = {
                dr: [],
                cr: [],
                dr_date: [],
                cr_date: []
            };
            for (let n = 0; n < entries.length; n++) {
                if (entries[i].Cr == entries[n].Cr) {
                    balance.cr.push(entries[n].CrMoney);
                    balance.cr_date.push(entries[n].Date);
                }
                if (entries[i].Cr == entries[n].Dr) {
                    balance.dr.push(entries[n].DrMoney);
                    balance.dr_date.push(entries[n].Date);
                }
            }
            accounts_name.push(name);
            t_acc(balance, name);
        }
    }
    $('#t_acc').html(t_accounts);
    sorting(trial_balance);
    trial_bal();
}

function t_acc(b, n) {
    let dr_b = 0,
        cr_b = 0,
        f = 0;
    acc = '<div class="acc">';
    acc += '<h6>' + n + '</h6>';
    acc += '<div class="t_dc">';
    acc += '<div class="t_d">';

    for (let i = 0; i < b.dr.length; i++) {
        acc += '<div>';
        acc += '<span class="t_l">' + b.dr_date[i] + '</span>';
        acc += '<span class="t_r">' + b.dr[i] + '</span></div>';
        dr_b += Number(b.dr[i]);
    }

    acc += '</div><div class="t_c">';

    for (let i = 0; i < b.cr.length; i++) {
        acc +=
            '<div><span>' +
            b.cr_date[i] +
            '</span><span>' +
            b.cr[i] +
            '</span></div>';
        cr_b += Number(b.cr[i]);
    }
    acc += '</div></div>';
    acc += '<div class="calc">';
    var final_c = '',
        final_d = '';
    if (cr_b > dr_b) {
        final_c = cr_b - dr_b;
    } else if (cr_b < dr_b) {
        final_d = dr_b - cr_b;
    }
    acc += '<div class="a_d">' + final_d + '</div>';
    acc += '<div class="a_c">' + final_c + '</div>';
    acc += '</div></div>';
    if (final_d > 0) {
        f = final_d;
    } else if (final_c > 0) {
        f = 0 - final_c;
    }

    let entry = [n, f];
    trial_balance.push(entry);

    t_accounts += acc;
}

function trial_bal() {
    var tmp = '';
    var total_dr = 0;
    var total_cr = 0;

    for (let i = 0; i < trial_balance.length; i++) {
        tmp += '<tr class="text-right">';
        tmp += '<td class="text-center">' + trial_balance[i][0] + '</td>';
        if (trial_balance[i][1] > 0) {
            tmp += '<td>' + trial_balance[i][1] + '</td><td> </td></tr>';
            total_dr += Number(trial_balance[i][1]);
        } else if (trial_balance[i][1] < 0) {
            tmp +=
                '<td> </td><td>' +
                Number(0 - trial_balance[i][1]) +
                '</td></tr>';
            total_cr += Number(trial_balance[i][1]);
        }
    }
    $('#trial_body').html(tmp);
    var tmp1 =
        '<th class="text-center">Total</th><th>' +
        total_dr +
        '</th><th>' +
        Number(0 - total_cr) +
        '</th>';
    $('#total_trial').html(tmp1);
    income_statements();
}

function income_statements() {
    var revenue = [];
    var expenses = [];
    var total_r = 0;
    var total_e = 0;
    net_income = 0;
    for (let i = 0; i < entries.length; i++) {
        if (
            entries[i].Dr.search(/Revenue/i) != -1 ||
            entries[i].Dr.search(/Revenues/i) != -1
        ) {
            revenue.push({ name: entries[i].Dr, money: entries[i].DrMoney });
        }
        if (
            entries[i].Cr.search(/Revenue/i) != -1 ||
            entries[i].Cr.search(/Revenues/i) != -1
        ) {
            revenue.push({ name: entries[i].Cr, money: entries[i].CrMoney });
        }
        if (entries[i].Dr.search(/Expenses/i) != -1) {
            expenses.push({ name: entries[i].Dr, money: entries[i].DrMoney });
        }
        if (entries[i].Cr.search(/Expenses/i) != -1) {
            expenses.push({ name: entries[i].Cr, money: entries[i].CrMoney });
        }
    }

    var tmp = `
            <thead>
                <th class="text-center" colspan="2">Revenues</th>
            </thead>`;

    for (let i = 0; i < revenue.length; i++) {
        tmp +=
            `
            <tbody>
                <tr>
                    <td class="w-50">` +
            revenue[i].name +
            `</td>
                    <td class="w-50">` +
            revenue[i].money +
            `</td>
                </tr>
            </tbody>
            `;
        total_r += Number(revenue[i].money);
    }
    tmp +=
        `
        <tfoot>
            <th>Total Revenue</th>
            <th>` +
        total_r +
        `</th>
        </tfoot>`;

    $('#revenue').html(tmp);

    var tmp1 = `
            <thead>
                <th class="text-center" colspan="2">Expenses</th>
            </thead>`;

    for (let i = 0; i < expenses.length; i++) {
        tmp1 +=
            `
            <tbody>
                <tr>
                    <td class="w-50">` +
            expenses[i].name +
            `</td>
                    <td class="w-50">` +
            expenses[i].money +
            `</td>
                </tr>
            </tbody>
            `;
        total_e += Number(expenses[i].money);
    }
    tmp1 +=
        `
        <tfoot>
            <th>Total Expenses</th>
            <th>` +
        total_e +
        `</th>
        </tfoot>`;
    $('#expenses').html(tmp1);

    net_income = Number(total_r - total_e);
    var tmp2 =
        `
        <thead>
            <th class="w-50">Net Income</th>
            <th class="w-50">` +
        net_income +
        `</th>
        </thead>`;
    $('#net_income').html(tmp2);
    owner_equity();
}

function owner_equity() {
    var capital = 0;
    var withdrawals = 0;
    end_capital = 0;

    for (let i = 0; i < entries.length; i++) {
        if (entries[i].Dr.search(/Capital/i) != -1) {
            capital -= Number(entries[i].DrMoney);
        }
        if (entries[i].Cr.search(/Capital/i) != -1) {
            capital += Number(entries[i].CrMoney);
        }
        if (
            entries[i].Dr.search(/Withdrawals/i) != -1 ||
            entries[i].Dr.search(/Withdrawal/i) != -1
        ) {
            withdrawals += Number(entries[i].DrMoney);
        }
        if (
            entries[i].Cr.search(/Withdrawals/i) != -1 ||
            entries[i].Cr.search(/Withdrawal/i) != -1
        ) {
            withdrawals -= Number(entries[i].CrMoney);
        }
    }
    end_capital = Number(capital + net_income - withdrawals);
    var tmp =
        `<thead>
                <th colspan="2">Owner's Equity Statement</th>
            </thead>
            <tbody>
                <tr>
                    <td>Capital</td>
                    <td>` +
        capital +
        `</td>
                </tr>
                <tr>
                    <td>Net Income</td>
                    <td>` +
        net_income +
        `</td>
                </tr>
                <tr>
                    <td>Withdrawals</td>
                    <td>` +
        withdrawals +
        `</td>
                </tr>
            </tbody>
            <tfoot>
                <th>End Capital</th>
                <th>` +
        end_capital +
        `</th>
            </tfoot>`;

    $('#o_e').html(tmp);
    balance_sheet();
}

function sorting(ar) {
    var tmp_n;
    var tmp_c;
    var max_n;
    var max_i;

    for (var i = 0; i < ar.length; i++) {
        max_n = ar[i][1];
        max_i = i;

        for (var x = i + 1; x < ar.length; x++) {
            if (ar[x][1] > max_n) {
                max_n = ar[x][1];
                max_i = x;
            }
        }
        tmp_n = ar[i][0];
        tmp_c = ar[i][1];
        ar[i][0] = ar[max_i][0];
        ar[i][1] = ar[max_i][1];
        ar[max_i][0] = tmp_n;
        ar[max_i][1] = tmp_c;
    }
}

function balance_sheet() {
    var t_b = [];
    var dr = 0;
    var cr = 0;
    var t_l = 0;
    var t_a = 0;

    for (var i = 0; i < trial_balance.length; i++) {
        if (
            Number(trial_balance[i][1]) > 0 &&
            trial_balance[i][0].search(/Withdrawals/i) == -1 &&
            trial_balance[i][0].search(/Withdrawal/i) == -1 &&
            trial_balance[i][0].search(/Expenses/i) == -1
        ) {
            t_b[dr] = [trial_balance[i][0], trial_balance[i][1], '', 0];
            t_a += t_b[dr][1];
            dr++;
        } else if (
            Number(trial_balance[i][1]) < 0 &&
            trial_balance[i][0].search(/Revenues/i) == -1 &&
            trial_balance[i][0].search(/Revenue/i) == -1 &&
            trial_balance[i][0].search(/Capital/i) == -1
        ) {
            if (cr <= dr) {
                t_b[cr][2] = trial_balance[i][0];
                t_b[cr][3] = Number(0 - trial_balance[i][1]);
            } else {
                t_b[cr] = [
                    '',
                    0,
                    trial_balance[i][0],
                    Number(0 - trial_balance[i][1])
                ];
            }
            t_l += t_b[cr][3];
            cr++;
        }
    }
    console.log(trial_balance);
    console.log(t_b);

    var tmp = `<thead>
                    <th colspan="4">Balance Sheet Statement</th>
                </thead>
                <thead>
                    <th colspan="2">Assets</th>
                    <th colspan="2">Liabilties</th>
                </thead>
                <tbody>`;

    for (var i = 0; i < t_b.length; i++) {
        var em1 = t_b[i][1] != 0 ? t_b[i][1] : ' ';
        var em2 = t_b[i][3] != 0 ? t_b[i][3] : ' ';
        tmp +=
            `<tr>
                    <td>` +
            t_b[i][0] +
            `</td>
                    <td>` +
            em1 +
            `</td>
                    <td>` +
            t_b[i][2] +
            `</td>
                    <td>` +
            em2 +
            `</td>
                </tr>`;
    }

    tmp +=
        `</tbody>
            <thead>
                <th colspan="2"></th>
                <th>Total Liabilties</th>
                <th>` +
        t_l +
        `</th>
            </thead>`;

    tmp +=
        `<thead>
                <th colspan="2"></th>
                <th colspan="2" class="border">Owner's Equity</th>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td>End Capital</td>
                <td>` +
        end_capital +
        `</td>
            </tr>
            </tbody>
            <thead>
                <th></th>
                <th></th>
                <th>Total O.E</th>
                <th>` +
        end_capital +
        `</th>
            </thead>
            <thead>
                <th>Total Assets</th>
                <th>` +
        t_a +
        `</th>
                <th>Total Liabilties & O.E</th>
                <th>` +
        Number(end_capital + t_l) +
        `</th>
            </thead>`;

    $('#balance_sheet').html(tmp);
}
