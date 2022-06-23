const dependant_answer = `
<tr>
    <td class="text-center">
        <span class="fa fa-2x fa-times dependant-answers-remove" title="Quitar dependiente"></span>
    </td>
    <td class="text-center">
        <input type="text" name="d[<%= answer.index %>][label]" value=""
            class="form-control exercise-answer exercise-answer-text" />
    </td>
    <td class="text-center">
        <input type="number" name="d[<%= answer.index %>][amount]" value=""
            min="0" max="1000000" step="1"
            class="form-control exercise-answer exercise-answer-number" />
    </td>
</tr>
`;

export default dependant_answer;
