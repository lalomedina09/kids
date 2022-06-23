const budget_answer = `
<tr>
    <td class="text-center">
        <span class="fa fa-2x fa-times budget-answers-remove" title="Quitar rubro"></span>
    </td>
    <td class="text-center">
        <input type="text" name="b[e][<%= answer.index %>][label]" value=""
            class="form-control exercise-answer exercise-answer-text" />
    </td>
    <td class="text-center">
        <select name="b[e][<%= answer.index %>][type]"
            class="form-control exercise-answer exercise-answer-type">
            <option value="saving">Ahorro</option>
            <option value="expense">Gusto</option>
            <option value="fixed">Fijo</option>
        </select>
    </td>
    <td class="text-center">
        <input type="number" name="b[e][<%= answer.index %>][amount]" value=""
            min="0" max="1000000" step="1"
            class="form-control exercise-answer exercise-answer-number" />
    </td>
</tr>
`;

export default budget_answer;
